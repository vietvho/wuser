import React from 'react';
import TableRow from './TableRow.jsx';
import PropTypes from 'prop-types';

function TableBody(props) {
    const {colKeys, rows} = props;
    const tblBody = rows.map((row)=>
       <TableRow colKeys={colKeys} row={row} key={row.id}/>
    );
    
    return (<tbody>{tblBody}</tbody>);
}

TableBody.propTypes = {
    rows: PropTypes.array,
    colKeys: PropTypes.any
};

export default TableBody;