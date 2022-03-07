import React from 'react';
import PropTypes from 'prop-types';
import {ctxTable} from './context';

function TableRow(props) {
    const {colKeys,row,key} = props;
    const [staTable] = React.useContext(ctxTable);
    const headings = staTable.headings;
    
    if (!staTable['handleCell']) {
        staTable['handleCell'] = "";
    }

    let tblRow=[];
  
    if (!(typeof row === 'object' && row !== null)) {
      return <tr></tr>;
    }
  
    const keys = Array.isArray(colKeys) ? colKeys : Object.keys(row);

    tblRow = keys.map((colKey) => {
       return <td data-label={headings[colKey] ? headings[colKey] : colKey} key={key}><a href="javascript:void(0)"><span data-user-id={row.id} onClick={staTable['handleCell']}>{row[colKey]}</span></a></td>
    }
    );
    return <tr>{tblRow}</tr>
}

TableRow.propTypes = {
    row: PropTypes.object,
    colKeys: PropTypes.array,
    key: PropTypes.any
};

export default TableRow;