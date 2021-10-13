class Encrypter {
    constructor(){
        this.salts = ["Neln#AWa3FT{f,Hlq BkyQyQ3@pegRBh rpct3oOIVoob",
                 "ZsL prUhgMdMYHA YhfDgjAcwalbn4aWuSBkIhw MyeyHyjpn",
                 "AYhc5walbn aWuSB&kIhwMy",
                 "qzdn yJvVLSG YTt,qpRFjpBDpWk",
                 "WqDQm}wtZOGtXtfg HbWSnfnIZM UbuArXtfgH",
                 "fbGXGLj hyqb8xSe@pKzNrG",
                 "Hrwgx8RVU vGBANRw)oXrR W",
                 "rVnOpn4pct oaKvAb OIVVnOpnoobpy&SSjLGKW",
                 "aQbgKHSuL zuaKRVnOpneJywAB",
                 "a1oi7Tpc LaB(tz",
                 "aTr1pl,1hBP)ltaz2V vBnmI1!nvc",
                 ";odot2eaLl9:odot2eaLl9"]; //Removed last string as dollar sign was more trouble than it was worth in ensuring compatibility with PHP version
    }
    randomSalt(){
        return this.salts[Math.floor(Math.random() * this.salts.length)];
    }
    encrypt(string){
        var characters = string.split("").reverse();
        var encrypted_string = "";
        characters.forEach((character) => {
            encrypted_string = encrypted_string + this.randomSalt() + character + this.randomSalt();
        });
        return encrypted_string;
    }
    decrypt(string){
        var raw_string = string;
        this.salts.forEach(function(salt){
            raw_string = raw_string.replaceAll(salt, "");
        });
        return raw_string.split("").reverse().join("");
    }
}

var encrypter = new Encrypter();