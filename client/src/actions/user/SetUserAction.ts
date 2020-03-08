import Action from "../Action"
import ActionType from "../ActionType"
import User from "../../models/user/User"

export default interface SetUserAction extends Action {
    type: ActionType.SET_USER,
    user: User|null,
}
