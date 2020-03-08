import React from 'react'
import { Route, Switch, useRouteMatch } from 'react-router-dom'
import LoginPage from '../auth/login/LoginPage'
import RegisterPage from '../auth/register/RegisterPage'
import Err404Page from '../placeholder/errors/404/Err404Page'
import LogoutPage from '../auth/logout/LogoutPage'

const AuthRouter = () => {
  const {path, } = useRouteMatch();
  
  return (<Switch>
    <Route path={`${path}/login`}>
      <LoginPage />
    </Route>
    <Route path={`${path}/register`}>
      <RegisterPage />
    </Route>
    <Route path={`${path}/logout`}>
      <LogoutPage />
    </Route>
    <Route path={`${path}/*`}>
      <Err404Page />
    </Route>
  </Switch>)
}

export default AuthRouter
