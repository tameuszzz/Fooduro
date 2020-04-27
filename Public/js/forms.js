function register(){
    const form = document.forms[0];
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    var email = document.getElementById('email').value;

    if(firstName.length < 1 || lastName.length < 1 || pass1.length < 1 || pass2.length < 1 || email.length < 1){
        document.getElementById('com').innerHTML = 'Uzupełnij wszytskie pola!';
        form.reset;
    } else if(email.indexOf('@') == -1){
        document.getElementById('com').innerHTML = 'Podano zły email!';
        form.reset();
    } else if(pass1.length < 6 || pass1 != pass2){
        document.getElementById('com').innerHTML = 'Hasło krótsze niż 6 znaków lub hasła różne!'
        form.reset();
    } else {
        form.submit();
    }
}

function login(){
    const form = document.forms[0];
    var pass1 = document.getElementById('pass').value;
    var email = document.getElementById('email').value;

    if(pass1.length < 6 || email.length < 1 || email.indexOf('@') == -1){
        document.getElementById('com').innerHTML = 'Pola nie zostały uzupełnione prawidłowo!'
        form.reset();
    } else{
        form.submit();
    }
}

function contact(){
    const formy = document.forms[1]; //czemu 1? nie wiem xd
    var content = document.getElementById('content').value;
    if(content.length < 1){
        formy.reset();
    } else {
        formy.submit();
    }

}