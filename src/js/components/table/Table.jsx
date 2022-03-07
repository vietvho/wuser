import React, {useState} from 'react';
import TableBody from './TableBody.jsx';
import TableHead from './TableHead.jsx';
import PropTypes from 'prop-types';
import {ctxTable} from './context';
import Popup from '../popup.jsx';
import {getUser} from '../fetchUser';
import {Wloading} from "../Loading.jsx";

function WTable(props){
	const {headings,rows,colKeys} = props;
	const [isLoading, setIsLoading] = useState(false);
	const [staTable,setStaTable] = useState({headings: headings});
	const [showPopup,setShowPopup] = useState(false);
	const [popupContent,setPopupContent] = useState(1);

	const toggleClose = () => {
		setShowPopup(!showPopup);
	}

	const openPopup = (e) => {
		userInfomations(e.target.dataset.userId);
		setIsLoading(true);
	}

	function renderUserInfomations(obj) {
		const output = [];
		for (const [key, value] of Object.entries(obj)) {
			if (typeof value === 'object' && value !== null) {
				output.push(<li><strong className="u-txt--capitalize">{key}</strong>{renderUserInfomations(value)}</li>);
			}
			else {
				output.push(<li><strong className="u-txt--capitalize">{key}: </strong>{value}</li>);
			}
		}

	
		return (<ul>{output}</ul>);
	}
	

	const userInfomations =  (userId) => {
		const output = [];
		const userData = getUser(userId);
		userData.then( data => {
			setIsLoading(false);
			setShowPopup({showPopup: true});

			setPopupContent(<div className="c-popup__content">
				<h2>User Informations</h2>
				{renderUserInfomations(data)}
				</div>);
		});
		
		return output;
	}

	staTable['handleCell'] = openPopup;

	return (
		<>
		<ctxTable.Provider value={[staTable,setStaTable]}>
			<table className="c-table c-table--responsive">
				<TableHead 
					headings={headings}
					/>
				<TableBody
					rows={rows}
					colKeys={colKeys}
					/>
			</table>
		</ctxTable.Provider>

		{showPopup && <Popup 
			content= {popupContent}
			handleClose={toggleClose}
		/>}

		<Wloading isLoading={isLoading} />
		</>
	)  ;
}
  
WTable.propTypes = {
	headings: PropTypes.array,
	rows: PropTypes.array,
	colKeys: PropTypes.any
};


export default WTable;