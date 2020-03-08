import React from 'react'
import './Header.scss';
import { Options } from '../../PageStructure';
import { Link } from 'react-router-dom';

interface Props {
    options?: Options,
}

const Header = ({options}: Props) => {
    return (
        <header className="header" data-theme={options?.theme || ''}>
            <div className="content-wrapper">
                <Link to="/">Home</Link>
            </div>
        </header>
    );
}

export default Header
