import React from 'react'
import { useForm } from 'react-hook-form'
import { useDispatch } from 'react-redux';
import ActionType from '../../../../actions/ActionType';
import User from '../../../../models/user/User';
import { useHistory } from 'react-router-dom';
import Api from '../../../../api/Api';

type FormData = {
    email: string;
    password: string;
};

const RegisterForm = () => {
    const { register, handleSubmit, errors } = useForm<FormData>();
    const dispatch = useDispatch();
    const history = useHistory();

    const onSubmit = async ({email, password}: FormData) => {
        try {
            const response = await Api.post('/auth/register.php', {email, password})
            const content = await response.json();

            if (content.success) {
                dispatch({
                    type: ActionType.SET_USER,
                    user: (new User()).deserialize(content.user)
                });
                history.push('/');
            }
        } catch(e) {}
    }
    
    return (
        <form onSubmit={handleSubmit(onSubmit)}>
            <input
                type="email"
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
                    minLength: 6,
                })} 
            />
            <button type="submit">Submit</button>
            {errors.password && <p className="error-msg">
                Password has to be at least 6 characters long!
            </p>}
        </form>
    )
}

export default RegisterForm
