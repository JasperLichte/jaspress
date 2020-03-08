import Serializable from "../Serializable";

export default class User implements Serializable<User> {
    private id: number = 0;
    private email: string = '';
    private password: string = '';
    private isAdmin: boolean = false;
    private name: string = '';

    public getId = () => this.id;
    public getEmail = () => this.email;
    public getPassword = () => this.password;
    public getIsAdmin = () => this.isAdmin;
    public getName = () => this.name;

    public notNull = () => this.id && this.email;

    public deserialize(input: {}): User {
        // @ts-ignore
        this.id = parseInt(input.id) || this.id;
        // @ts-ignore
        this.email = input.email || this.email;
        // @ts-ignore
        this.password = input.password || this.password;
        // @ts-ignore
        this.isAdmin = !!input.isAdmin;
        // @ts-ignore
        this.name = input.name || this.name;

        return this;
    }
}
