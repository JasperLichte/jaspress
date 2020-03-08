import React, { useState } from 'react'
import { useForm } from 'react-hook-form'
import { useDispatch } from 'react-redux';
import ActionType from '../../../../actions/ActionType';
import User from '../../../../models/user/User';
import {useHistory } from 'react-router-dom';
import Api from '../../../../api/Api';

type FormData = {
    email: string;
    password: string;
};

const LoginForm = () => {
    const { register, handleSubmit, errors } = useForm<FormData>();
    const [error, setError] = useState('');
    const history = useHistory();
    const dispatch = useDispatch();

    const onSubmit = async ({email, password}: FormData) => {
        try {
            const content = await Api.post(
                '/auth/login.php',
                {email, password}
            )

            if (content.success) {
                const user = (new User()).deserialize(content.user);

                if (user.notNull()) {
                    dispatch({
                        type: ActionType.SET_USER,
                        user,
                    });
                    history.push('/');
                }
            } else {
                setError('Invalid email or password');
            }
        } catch(e) {}
    }

    return (
        <form onSubmit={handleSubmit(onSubmit)}>
            <input
                type="text"
                name="email"
                placeholder="eMail"
                ref={register({
                    required: true,
                })}
            />
            <input
                type="password"
                name="password"
                placeholder="Password"
                ref={register({
                    required: true,
                    minLength: 3,
                })} 
            />
            <button type="submit">Submit</button>
            {errors.password && <p className="error-msg">
                Password has to be at least 6 characters long!
            </p>}
            {error && <p className="error-msg">{error}</p>}
        </form>
    )
}

export default LoginForm
