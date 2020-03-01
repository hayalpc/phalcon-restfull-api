# phalcon-restfull-api
Abonelikli sistem ile ücretli kullanıcılara şehirleri için günlük 9:00'da hava durumu göndermek için geliştirilmiş bir mini phalcon projedir.

# Register & Authenticate
| Route | HTTP Verb	 | Content-Type | POST body	 | Description	 |
| --- | --- | --- | --- | --- |
| /register | `PUT` | application/x-www-form-urlencoded | email=test@test.com&password=1234&city=Istanbul&language=tr&os=Windows  | Create a new user. |
| /authenticate | `POST` | application/x-www-form-urlencoded | email=test@test.com&password=1234  | Generate a token. |

# Headers
| Key | Body | Description	 |
| --- | --- | --- |
| Authorization-Token | --- | Token by authenticate |

# Users
| Route | HTTP Verb	 | Content-Type | POST body | Description	 |
| --- | --- | --- | --- | --- |
| /user/detail | `GET` | Empty | Empty | List all of user detail. |
| /user/redeem | `PUT` | application/x-www-form-urlencoded| code=ASDASD | Redeem code. |
| /user/update | `PUT` | application/x-www-form-urlencoded| password=1234&city=Istanbul&language=tr&os=Windows | Update user informations. |

