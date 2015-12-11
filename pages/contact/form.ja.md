---
title: 御問い合わせ

form:
    name: contact

    fields:
        - name: name
          label: 名前
          placeholder: ここに、御名前を …
          autofocus: on
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: メールアドレス
          placeholder: ここに、メールアドレスを …
          type: email
          validate:
            rule: email
            required: true

        - name: message
          label: 伝言
          placeholder: ここに、御作文を …
          type: textarea
          validate:
            required: true

    buttons:
        - type: submit
          value: 認証
        - type: reset
          value: 取り消し

    process:
        - email:
            subject: "[Site Contact Form] {{ form.value.name|e }}"
            body: "{% include 'forms/data.html.twig' %}"
        - save:
            fileprefix: contact-
            dateformat: Ymd-His-u
            extension: txt
            body: "{% include 'forms/data.txt.twig' %}"
        - message: ご連絡を感謝しています ♪
        - display: thankyou
---

## 御問い合わせするには …