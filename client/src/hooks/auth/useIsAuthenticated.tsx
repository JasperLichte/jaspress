import { useSelector } from "react-redux";
import { userSelector } from "../../selectors/selectors";

const useIsAuthenticated = (): boolean => {
    const user = useSelector(userSelector);

    return (user !== null);
}

export default useIsAuthenticated;
