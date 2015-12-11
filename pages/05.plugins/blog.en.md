---
title: plugins
blog_url: plugins

content:
    items: @self.children
    order:
        by: default
        dir: asc
    limit: 10
    pagination: true

feed:
    description: Sample Plugins Description
    limit: 10

pagination: true
---