---
title: ホーム
menu: ホーム
onpage_menu: true
body_classes: "modular header-image fullwidth"
anchors:
    active: false

form:
    action: /home
    name: contact 
    fields:
        - name: name
          label: 名前
          placeholder: 御名前を …
          classes: curtain-contact-form
          autofocus: off
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: メールアドレス
          placeholder: メールアドレスを …
          classes: curtain-contact-form
          type: email
          validate:
            rule: email
            required: true

        - name: message
          label: 伝言
          placeholder: 御作文を …
          classes: curtain-contact-form
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
            from: "{{ config.plugins.email.from }}"
            to:
              - "{{ config.plugins.email.from }}"
              - "{{ form.value.email }}"
            subject: "[Site Contact Form] {{ form.value.name|e }}"
            body: "{% include 'forms/data.html.twig' %}"
        - save:
            fileprefix: contact-
            dateformat: Ymd-His-u
            extension: txt
            body: "{% include 'forms/data.txt.twig' %}"
        - message: ご連絡を感謝しています ♪
        - display: thankyou

content:
    items: '@self.modular'
    order:
        by: default
        dir: asc
        custom:
            - _landing-curtain
            - _blog
            - _docs
            - _about
            - _contact
---
