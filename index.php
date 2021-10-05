<?php

class kurGetir
{
    private $xml = ""; //çektiğimiz xml verisi..

    // dolar ve euronun oranını çeker (dolar kuru / euro kuru çapraz kurdur.)
    function caprazKurGetir(){
        
        return str_replace(",",".",$this->xml->Currency[3]->CrossRateOther[0]);
    }
    
    //dolar kurunu çeker.
    function dolarKurGelsin(){   
        //xmldeki 4 veriyi çekmeye yarıyor. herhangi birini kullanabilirsiniz.
        return str_replace(",",".",$this->xml->Currency[0]->ForexBuying[0]); //Döviz Alış 
        return str_replace(",",".",$this->xml->Currency[0]->ForexSelling[0]); //Döviz Satış 
        return str_replace(",",".",$this->xml->Currency[0]->BanknoteBuying[0]); //Efektif Alış
        return str_replace(",",".",$this->xml->Currency[0]->BanknoteSelling[0]); //Efektif Satış
    }

    //euro kurunu çeker.
    function euroKurGelsin(){   
        //xmldeki 4 veriyi çekmeye yarıyor. herhangi birini kullanabilirsiniz.
        return str_replace(",",".",$this->xml->Currency[3]->ForexBuying[0]); //Döviz Alış 
        return str_replace(",",".",$this->xml->Currency[3]->ForexSelling[0]); //Döviz Satış 
        return str_replace(",",".",$this->xml->Currency[3]->BanknoteBuying[0]); //Efektif Alış
        return str_replace(",",".",$this->xml->Currency[3]->BanknoteSelling[0]); //Efektif Satış
    }
    
    function __construct(){
        // xml dosyasına istek atmak için curl kullanıyoruz
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.tcmb.gov.tr/kurlar/today.xml");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_REFERER,'http://www.google.com.tr');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
        $this->xml = simplexml_load_string(curl_exec($ch));
        curl_close($ch);
    }

}


//  örnek bir veri çekme uygulaması. fonksiyonun ismini yazmak yeterli.
$kurlar = new kurGetir;
echo $kurlar->euroKurGelsin();




 ?>
