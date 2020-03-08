import React from 'react'
import './Footer.scss';
import { Options } from '../../PageStructure';

interface Props {
    options?: Options,
}

const Footer = ({options}: Props) => {
    return (
        <footer className="footer" data-theme={options?.theme || ''}>
            <div className="content-wrapper">
            </div>
        </footer>
    )
}

export default Footer
