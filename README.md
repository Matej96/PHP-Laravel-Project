# Semestrálny projekt - E-shop
Projekt vykonaný v tíme zloženom z 3 ľudí. Vývoj od úplnych základov (návrh skíc stránok a databázy, vytvorenie responzívnych šablón, implementácia backend-u)

Stručné zadanie:

**Klientská časť**
* zobrazenie prehľadu všetkých produktov z vybratej kategórie používateľom
    * základné filtrovanie (aspoň podľa 3 atribútov, napr. rozsah cena od-do, značka, farba)
    * stránkovanie
    * preusporiadanie produktov (napr. podľa ceny vzostupne/zostupne)
* zobrazenie konkrétneho produktu - detail produktu
    * pridanie produktu do košíka (ľubovolné množstvo)
* plnotextové vyhľadávanie nad katalógom produktov
* zobrazenie nákupného košíka
    * zmena množstva pre daný produkt
    * odobratie produktu
    * výber dopravy
    * výber platby
    * zadanie dodacích údajov
    * dokončenie objednávky
	* umožnenie nákupu bez prihlásenia
	* prenositeľnosť nákupného košíka v prípade prihláseného používateľa
* registrácia používateľa/zákazníka
* prihlásenie používateľa/zákazníka
* odhlásenie zákazníka

**Administrátorská časť**
* prihlásenie administrátora do administrátorského rozhrania eshopu
* odhlásenie administrátora z administrátorského rozhrania
* vytvorenie nového produktu administrátorom cez administrátorské rozhranie
  * produkt musí obsahovať minimálne názov, opis, aspoň 2 fotografie
* upravenie/vymazanie existujúceho produktu administrátorom cez administrátorské rozhranie

# Štruktúra repozitára
- images - obsahuje všetky použité obrázky 
- navrhy - obsahuje návrh databázy a skíc + dokumentácia spolu so screenshotmi jednotlivých prípadov použitia
- script - obsahuje všetky javascript súbory
- style  - obsahuje všetky css súbory
- WearIT - obsahuje Laravel aplikáciu, kde sme spravili back-end pre nami predom vytvorený front-end
