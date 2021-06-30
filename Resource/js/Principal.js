class Principal{
    linkPrincipal(link){
        let url = "";
        let cadena = link.split("/");
        for(let i = 0; i < cadena.length; i++){
            if(i >= 2){
                url += cadena[i];

                /*console.log(url);*/
            }
        }

        
        switch (url){
            case "UserRegister":
                document.getElementById('files').addEventListener('change', imageUser, false);
                break;
        }
    }
}