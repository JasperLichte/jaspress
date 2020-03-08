import { useState, useEffect } from "react";
import Api from "../api/Api";

const useFetchPreflightRequest = (): [boolean, {}] => {
    const [ loading, setLoading ] = useState(true);
    const [ data, setData ] = useState<{}>({});
  
    useEffect(() => {
      Api.post('/preflight.php').then(_data => {
        setData(_data);
        setLoading(false);
      })
    }, [setLoading, setData]);

    return [loading, data]
}

export default useFetchPreflightRequest;
