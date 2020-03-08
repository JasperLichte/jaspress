import State from '../models/State';
import ActionType from '../actions/ActionType';
import SetUserAction from '../actions/user/SetUserAction';

const rootReducer = (
    state: State = new State(),
    action: SetUserAction
): State => {
    switch(action.type) {
        case ActionType.SET_USER:
            return {...state, user: action.user};
    }

    return state;
}

export default rootReducer;
