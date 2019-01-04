# Craft 3 Navigation API

This plugin extends the [Verbb Navigation](https://github.com/verbb/navigation) plugin to provide REST API support.

Requires the [Future Activities Craft 3 REST API](https://github.com/FutureActivities/Craft3-REST-API) plugin.

## Usage

    GET /rest/v1/nav[?filter,expand]
    GET /rest/v1/nav/<id>[?expand]
    
where:

- `filter` is an array of values to filter the results
- `expand` is a field name to expand, e.g. descendants to return objects instead of IDs

## Examples

Get all nodes across all menus (supports filtering)

    GET /rest/v1/nav

Get all nodes in menu ID 1:

    GET /rest/v1/nav/1
    
Get all nodes in menu ID 1 and expand the descendants:

    GET /rest/v1/nav/1?expand=descendants