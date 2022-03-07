import React from 'react';
import PropTypes from 'prop-types';
import {ctxTable} from './context';

function TableHead(props) {
    const {headings} = props;
    const [staTable, setStaTable] = React.useContext(ctxTable);

    staTable['headings'] = {};

    const tblHead = headings.map((heading)=>{
        staTable['headings'][heading.key] = heading.text;
        
        return (<th 
          key={heading.key}>
          {heading.text}
        </th>);
      }
    );

    setStaTable(staTable);

    return (<thead><tr>{tblHead}</tr></thead>);
}

TableHead.propTypes = {
  headings: PropTypes.array,
};

export default TableHead;  