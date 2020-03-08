import React, { useEffect } from 'react'
import { useHistory } from 'react-router-dom';
import Api from '../../../api/Api';
import { useDispatch } from 'react-redux';
import ActionType from '../../../actions/ActionType';

const LogoutPage = () => {
    const dispatch = useDispatch();
    const history = useHistory();

    useEffect(() => {
        Api.get('/auth/logout').then(_ => {
            dispatch({type: ActionType.SET_USER, user: null});
            history.replace('/auth/login');
        });
    }, [dispatch, history]);

    return (<>logging out..</>)
}

export default LogoutPage
