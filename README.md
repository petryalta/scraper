
Если есть такая ошибка `Uncaught ImagickException: not authorized` надо заменить строку
`<policy domain="coder" rights="none" pattern="PDF" />` на `<policy domain="coder" rights="read|write" pattern="PDF" />`
в файле `/etc/Imagemagick-6/policy.xml`
