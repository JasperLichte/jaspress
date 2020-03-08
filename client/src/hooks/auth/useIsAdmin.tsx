import { useSelector } from "react-redux";
import { userSelector } from "../../selectors/selectors";

const useIsAdmin = (): boolean => {
    const user = useSelector(userSelector);

    return (user !== null && user.getIsAdmin());
}

export default useIsAdmin;
