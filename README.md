# php-kur-bilgisi
PHP ile kur bilgilerini çeker.


Çekmek istediğiniz kurun fonksiyon adını yazarak çekebilirsiniz. Eğer çekmek istediğiniz kur bilgisi EURO-DOLAR-ÇAPRAZ KUR dışındaysa şu adımları izleyin.


1. https://www.tcmb.gov.tr/kurlar/today.xml adresine gidin.
2. çekmek istediğiniz kurun kaçıncı sırada olduğuna bakın. Ve sıra numarasını 1 eksiltin. (örn: EURO  4.satırda bir eksilttiğimde 3 kalıyor).
3. index.phpde bir fonksiyon oluşturun.
4. $this->xml->Currency[satır sırası (euro için 3)]->ForexBuying[0] satırı size ilgili dolar kurunu verecektir.

:)
