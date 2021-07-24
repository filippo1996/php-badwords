/**
 * Chiamata API al server con XMLHttpRequest
 */

function XmlHttpRequest(method, url){
    return new Promise((resoleve, reject) => {
        let xhttp = new XMLHttpRequest();
        xhttp.open(method, url);
        xhttp.onload = function(){
            if(xhttp.readyState === 4 && xhttp.status === 200){
                let response = xhttp.response;
                resoleve(JSON.parse(response));
            } else {
                reject({
                    status: xhttp.status,
                    statusText: xhttp.statusText
                });
            }
        };
        xhttp.onerror = function(){
            reject({
                status: '',
                statusText: 'Connessione internet assente oppure il server non è raggiungibile'
            });
        };
        xhttp.send();
    });
}


/**
 * Avviamo la chiamata al server
 */
async function sendRequest(str){
    try{
        let params = `string=${str}`;
        let response = await XmlHttpRequest('GET', `http://localhost/corso-boolean-php/php-badwords/requests/censorshiprequest.php?${params}`);
        return response;
    } catch(e) {
        console.log(e);
    }
}

/**
 * Event submit form
 */
const eleSubmit = document.getElementById('submit');

eleSubmit.addEventListener('click', async function(event){
    event.preventDefault();
    let eleInput = document.querySelector('#searchWord');
    let result = await sendRequest(eleInput.value);

    //Stampiamo sull'html il risultato ottenuto dalla chiamata api
    document.getElementById('contentStr').innerHTML = result.handle;

    //Stampaimo il messaggio del risultato della chiamata
    document.getElementById('message').innerHTML = result.response;
});