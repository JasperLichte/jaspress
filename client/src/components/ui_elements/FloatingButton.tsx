import React, { MouseEventHandler } from 'react'
import './FloatingButton.scss'

interface Props {
    children: React.ReactNode,
    onClick?: MouseEventHandler,
}

const FloatingButton = (props: Props) =>
    (<button
        onClick={props.onClick}
        className="floating-button"
    >
        {props.children}
    </ button>)

export default FloatingButton
