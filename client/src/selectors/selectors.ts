import State from '../models/State';
import User from '../models/user/User';

type Selector<T> = (state: State) => T;

export const stateSelector: Selector<State> = state => state;
export const userSelector: Selector<User|null> = state => state.user;
