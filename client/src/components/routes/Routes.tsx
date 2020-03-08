import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import AuthRouter from './AuthRouter';
import Err404Page from '../placeholder/errors/404/Err404Page';
import { useDispatch } from 'react-redux';
import ActionType from '../../actions/ActionType';
import LoadingSpinner from '../placeholder/LoadingSpinner';
import useFetchPreflightRequest from '../../hooks/useFetchPreflightRequest';
import LandingPage from '../landing_page/LandingPage';
import React, { Dispatch } from "react";
import User from "../../models/user/User";

const Routes: React.FC = () => {
  const [ dataIsLoading, data ] = useFetchPreflightRequest();
  const dispatch = useDispatch();

  if (!dataIsLoading && data) {
    handlePrefligthData(dispatch)(data);
  }

    return (dataIsLoading
            ? <LoadingSpinner />
            : (<Router>
                <Switch>
                  <Route path="/auth">
                    <AuthRouter />
                  </Route>
                  <Route exact path="/">
                    <LandingPage />
                  </Route>
                  <Route path="*">
                    <Err404Page />
                  </Route>
                </Switch>
              </Router>));
}

const handlePrefligthData = (dispatch: Dispatch<any>) => (data: {}) => {
  // @ts-ignore
  const { user } = data;

  if (user) {
    const _user = (new User()).deserialize(user);
    dispatch({
      type: ActionType.SET_USER,
      user: (_user.notNull() ? _user : null),
    });
  }

}

export default Routes;
