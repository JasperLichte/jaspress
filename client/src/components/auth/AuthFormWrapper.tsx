import React from 'react'
import './AuthFormWrapper.scss';
import './AuthForm.scss';

const AuthFormWrapper: React.FC = ({children}) => (
<div className="auth-form-wrapper">
    <div>
        {children}
    </div>
</div>)

export default AuthFormWrapper
