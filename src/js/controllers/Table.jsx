import React from 'react';
import reactDom from "react-dom";
import WTable from "../components/table/Table.jsx";
import { getUsers } from '../components/fetchUser.js';
  
const userHeading = [
{key: 'id', text: 'ID'},
{key: 'name', text: 'Name'},
{key: 'username', text: 'User Name'}
];

export const renderTable = ()=>{
    const testData = getUsers();
    testData.then(data=> {
        const targetEl = document.getElementById('app');
        if (targetEl) {
            reactDom.render(<WTable 
                colKeys={["id","name","username"]}
                headings={userHeading} 
                rows={data}
                />,targetEl);
        }
    
   })

}
