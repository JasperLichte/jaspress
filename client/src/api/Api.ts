export default class Api {

    private static fetchOptions = (): RequestInit => ({
        credentials: 'include',
        headers: {
            'Accept': 'application/json',
            'Content-type': 'application/json',
        }
    });

    public static get = (path: string) => 
        Api.doRequest(path, {method: 'GET'});

    public static post = (path: string, body: {} = {}) => {
        const options: any = {
            method: 'POST',
        }
        if (Object.keys(body).length) {
            options['body'] = JSON.stringify(body);
        }

        return Api.doRequest(path, options);
    }

    private static doRequest = async (path: string, options: {}) => {
        const res = await fetch(`${process.env.REACT_APP_SERVER_BASE_URL}/api${path}`, {
            ...Api.fetchOptions(),
            ...options
        });
        const content = await res.json();
        return content.data;
    }

}
