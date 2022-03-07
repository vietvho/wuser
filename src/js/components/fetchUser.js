const wajax = wajax ? wajax : {ajax_url: window.location.origin + "/wp-admin/admin-ajax.php"};
const ajaxUrl = wajax.ajax_url;

export async function getUsers() {
    let formData = new FormData();
    formData.append( 'action', 'get_user_list' );

    const response = await fetch( ajaxUrl, {
        method: 'POST',
        body: formData}).catch( err => console.log( err ) );
    
    return response.json();   
}

export async function getUser(userID) {
    let cacheUsers = localStorage.getItem("users") ? JSON.parse(localStorage.getItem("users")) : {};
    
    if (cacheUsers && cacheUsers[userID]) {
        return cacheUsers[userID];
    }
    else {
        let formData = new FormData();
        formData.append( 'action', 'get_user_details' );
        formData.append( 'userID', userID );
        
        const response  = await fetch( ajaxUrl, {
            method: 'POST',
            body: formData})           
            .catch( err => console.log( 'loi',err ) );
        const result = response.json();
        result.then(data =>{
                cacheUsers[userID] = data;
                localStorage.setItem('users', JSON.stringify(cacheUsers));
            }
        )

        return result;
    }
}
