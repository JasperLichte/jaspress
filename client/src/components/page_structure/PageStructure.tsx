import React from 'react'
import Header from './modules/header/Header';
import Footer from './modules/footer/Footer';
import './PageStructure.scss';
import Theme, { defaultTheme } from './Theme';

export interface Options {
    withoutHeading?: boolean,
    theme?: Theme,
}

interface Props {
    children: React.ReactNode,
    options?: Options,
    className?: string,
}

const PageStructure = ({children, options, className}: Props) => {
    if (options) {
        options.theme = options.theme || defaultTheme;
    }

    return (
        <div className="page-structure">
            <Header options={options}></Header>
                {children}
            <Footer options={options}></Footer>
        </div>);
};

export default PageStructure;
