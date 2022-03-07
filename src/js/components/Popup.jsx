import React from "react";
import PropTypes from 'prop-types';
 
const Popup = props => {
    const {content,handleClose} = props;
    return (
    <div className="c-popup">
        <div className="c-popup__overlay" onClick={handleClose}></div>

        <div className="c-popup__box">
            <span className="close-icon" onClick={handleClose}>x</span>
            {content}
        </div>
    </div>
    );
};

Popup.propTypes = {
	content: PropTypes.any,
	handleClose: PropTypes.bool
};

export default Popup;