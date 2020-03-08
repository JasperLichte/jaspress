import React from 'react'
import PageStructure from '../../page_structure/PageStructure'
import AuthFormWrapper from '../AuthFormWrapper'
import RegisterForm from './form/RegisterForm'
import { Link } from 'react-router-dom'

const RegisterPage = () => (
    <PageStructure>
        <AuthFormWrapper>
            <h2>Register</h2>
            <RegisterForm />
            <div><Link to="/auth/login">Login instead</Link></div>
        </AuthFormWrapper>
    </PageStructure>
)

export default RegisterPage
