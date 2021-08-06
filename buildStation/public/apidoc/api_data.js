define({ "api": [
  {
    "type": "get",
    "url": "admin/AdminLogin/captcha",
    "title": "获取验证码",
    "group": "AdminLogin",
    "name": "admin/AdminLogin/captcha",
    "description": "<p>获取分类列表</p>",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"captcha_switch\": true,\n\"captcha_id\": \"captcha60f91864a2567\",\n\"captcha_src\": \"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAABBCAMAAACXQNqgAAAAeFBMVEXz+/5DeDjap86zzN7F0qrApt3Or+DJx6SdrKfcq7emx6W0m9Pd6uXH2syxybNZiFBvmGmFqYKZmqFUfk2Ik4ybuZtlhWJ1lWCWqXtTgUVfjWGXt7SXkqxthXJ7iYVRfEtZhVOJjZiNs4mZvZeEpXGku41jjlS0xpvEDcT2AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFjklEQVRogd2biZLjJhCGxeys5UOnHe0mu7kz2bz/G4ZuQOZooEHMVip/lVVj2ab5RB9IMF2n9fLSlet8Vq/30uXC/ebHj8+jUg2QYvnfAeVtocqb/75ANykJdN6hog3UsaDqgV5QBaZuN3hZMRT/eTXQBcX8Mlg5cOmAxxyRKHE9pBmux334YL15BeV/cwJ1yrMTHxtdr2BGyf6eHiH4E4AkTQKIe/EcIwiTJ8Le6oPTc/9jpSsAGWvONyGG9rQNMBmPZRCBBc8Kgwgluwy9JojMx0rXKJAaIcgJmuc4kDLgminjiRFZPN0OFPKYo0kpMaIwo9IKgVgxhL7WJYBONs8OFDjc86gVHyFmDB0bIf1KjRCyaCDftY3LWQIgP3Vo8eoqBWSIclXF0ESCSJ2+aoVWQJgUbEmDVFQXKJ4UskFqQJJAqBhPrEPMLw/bugxEA8m0TRLteZmOIT9t6zrE6KLqEJdnFkL8uTuA08Auv7BGRshUzkjapgsro4+n++MeiyFfyCMm0z5L+ZmZ1fPX1/1qXMPLxtLpIcTjxBshxSM2ZY9tomCuaY1sBQvo9AN08Q5XKE8EPPK1lprjEzUAegDQgws0j5sQS6m1IiATfzg5KIfa0InEneVyyzx0kxykkgDqCl3u1QzT1Z4e8CU96P5JDlE4MSfuVieZsEeJXxQ/ZbdrqAOON4ADjZi5EOZJhDDEPEH+QvwVNnRTKrMe05FIWsWIwzTr957jEUQSaAzbacSiUOTxfFYoSaBhGMdp8s597vv+R1NcGDxAP4VnWw4O8rhTbFKDiv/Zvb59L8vajKmr86orPTNddCFyJYHaeBzWVfW4I1dXF6HlEPW9PEzmLGOEVlWIPN3CWfxhZR62jYsUlMbFOS2BpNPN5nSeaPNbsEQQTUTA8cR6eAhA7mS5hyHCKGIO0fbMIIFCIChbWzg9Z4jFswoyoiXRT0J86ThpG90zPEvcCaPU7G8tR2LxjIHDGeEQfc0V1r0Ron90DMHtE2aiUiKbJ34rEDqcTgqdFUU5DXQhCu+E9x9s5UQuT2xeRjscxlD/THRZxdw2rnEmM2NcZy34O347HXO4HvNCxx6imSxESa3ctqOigGZy4JXLdWre/TOn7aXwcncNgCiemMMZIAD+hdN4ee8GUT6ojmIOF17Y3gL6VYjfOK2nChGtNzoxskXxDKTD4TRBx+Dt9vsfrKnLMI1lvftb8nwr+oUrMsWRDqcTHAoWwRrPxVDj9g0K0T/1LZA8E+VwyNL3uNyGCxKtgaZ11vPhN96jbkrUIlfU4VC4eHhresuJ2sSut3A5Yq8zVVrJqokAGghrc1OeVcMs6zSEixEIU01EOpyefSGQ9Llz1xZoxEnppN0isrpSSzRTidbMjyGGurP2u7r2KS2OU9BA1SM0LNFp2r4ezt9ZwNKYr6VHYqjL8rQGWjjVt/1uI+SR8dMcCCfC+fLbmkjHDLA0HqCNd6PaGGjPAdZGFnITRIUGlbWXmK8fS9u0qJyW2gRRqAzSscKq5K4UUnMDe89A5fqMpWGbyQLYSs+ViowQqGZtJtQ0H7pvSGp/Dp6T4fGAqraCxgtGAzFHyISQB1SxzPPuYm1jc/bXPFWzbvXeio/Q5bLvQXymOAcota0uJ32XYpurbMlVNobAjr8VRYuxrS4um0XZ+X5AJy14awElln4ZudADSm9HLdl9mkkKvhkHKLatjrPXQy3YWGYSQGXbqpNJwbMS7kuheSxw6/Gto95+FpOeNx7cIWwr79cEkLuua7O4WUCd2c1EbXG3UDLEiNMSIHtMrFNOPiXUDqgy7wRA2uPMEo06775LWWsGVJtHfSDrX17sma8/XmgudMr/ABC1lUATweOk/ZzXeTBHOGXXNClUKkzbT6DUNEu7oX3qX2RNMzs935grAAAAAElFTkSuQmCC\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminLogin.php",
    "groupTitle": "AdminLogin",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminLogin/captcha"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminLogin/login",
    "title": "登录",
    "group": "AdminLogin",
    "name": "admin/AdminLogin/login",
    "description": "<p>登录</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "captcha_id",
            "description": "<p>验证码id(获取验证码接口的返回值)</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "captcha_code",
            "description": "<p>验证码</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"登录成功\",\n\"data\": {\n\"admin_user_id\": 5,\n\"admin_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjY5Mzg1NTYsIm5iZiI6MTYyNjkzODU1NiwiZXhwIjoxNjI2OTgxNzU2LCJkYXRhIjp7ImFkbWluX3VzZXJfaWQiOjUsImxvZ2luX3RpbWUiOiIyMDIxLTA3LTIyIDE1OjIyOjM2IiwibG9naW5faXAiOiIxOTIuMTY4LjE3Ny4xNzEifX0.ikPJAIAHWxaujTUPiY5xD_Os2T4VdvNblU9MgewnoQ8\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminLogin.php",
    "groupTitle": "AdminLogin",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminLogin/login"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminLogin/logout",
    "title": "退出登录",
    "group": "AdminLogin",
    "name": "admin/AdminLogin/logout",
    "description": "<p>退出登录</p>",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"退出成功\",\n\"data\": {\n\"logout_time\": \"2021-07-22 15:25:33\",\n\"admin_user_id\": 5\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminLogin.php",
    "groupTitle": "AdminLogin",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminLogin/logout"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminMenu/add",
    "title": "菜单添加",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/add",
    "description": "<p>菜单添加</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_pid",
            "description": "<p>父id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_name",
            "description": "<p>菜单名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_url",
            "description": "<p>菜单url</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_menu",
            "description": "<p>是否导航菜单</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "icon",
            "description": "<p>前端使用</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "code",
            "description": "<p>前端使用</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>是否禁用</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"menu_pid\": \"1\",\n\"menu_name\": \"\",\n\"menu_url\": \"/admin/AdminMenu/list\",\n\"menu_sort\": 200,\n\"is_menu\": 1,\n\"icon\": 0,\n\"code\": 0,\n\"is_disable\": 0,\n\"create_time\": \"2021-07-22 15:25:33\",\n\"admin_menu_id\": 5\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminMenu/dele",
    "title": "菜单删除",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/dele",
    "description": "<p>菜单删除</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_id",
            "description": "<p>当前菜单id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_menu_id\": \"1\",\n\"delete_time\": \"\",\n\"is_delete\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/dele"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminMenu/disable",
    "title": "菜单是否禁用",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/disable",
    "description": "<p>菜单是否禁用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_id",
            "description": "<p>当前菜单id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>1是 0否</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_menu_id\": \"1\",\n\"update_time\": \"\",\n\"is_disable\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/disable"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminMenu/edit",
    "title": "菜单编辑",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/edit",
    "description": "<p>菜单编辑</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_id",
            "description": "<p>当前菜单id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_pid",
            "description": "<p>父id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_name",
            "description": "<p>菜单名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_url",
            "description": "<p>菜单url</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "menu_sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_menu",
            "description": "<p>是否导航菜单</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "icon",
            "description": "<p>前端使用</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "code",
            "description": "<p>前端使用</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>是否禁用</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_menu_id\": \"1\",\n\"menu_pid\": \"1\",\n\"menu_name\": \"\",\n\"menu_url\": \"/admin/AdminMenu/list\",\n\"menu_sort\": 200,\n\"is_menu\": 1,\n\"icon\": 0,\n\"code\": 0,\n\"is_disable\": 0,\n\"create_time\": \"2021-07-22 15:25:33\",\n\"admin_menu_id\": 5\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminMenu/info",
    "title": "菜单详情",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/info",
    "description": "<p>菜单详情</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_id",
            "description": "<p>菜单id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_menu_id\": 235,\n\"menu_pid\": 0,\n\"menu_name\": \"组织管理\",\n\"menu_url\": \"\",\n\"is_menu\": 1,\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"is_delete\": 0,\n\"create_time\": \"2021-07-06 16:00:26\",\n\"update_time\": \"2021-07-13 09:14:19\",\n\"delete_time\": null,\n\"icon\": \"el-icon-office-building\",\n\"code\": \"/organization\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/info"
      }
    ]
  },
  {
    "type": "get",
    "url": "admin/AdminMenu/list",
    "title": "菜单列表",
    "group": "AdminMenu",
    "name": "admin/AdminMenu/list",
    "description": "<p>菜单列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "type",
            "description": "<p>1所有的  2去除不需要权限的</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"list\": [\n{\n\"admin_menu_id\": 235,\n\"menu_pid\": 0,\n\"menu_name\": \"组织管理\",\n\"menu_url\": \"\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-06 16:00:26\",\n\"update_time\": \"2021-07-13 09:14:19\",\n\"is_menu\": 1,\n\"icon\": \"el-icon-office-building\",\n\"code\": \"/organization\",\n\"children\": [\n{\n\"admin_menu_id\": 245,\n\"menu_pid\": 235,\n\"menu_name\": \"组织列表\",\n\"menu_url\": \"\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-08 14:25:08\",\n\"update_time\": \"2021-07-13 09:02:15\",\n\"is_menu\": 1,\n\"icon\": \"el-icon-s-fold\",\n\"code\": \"/list\",\n\"children\": [\n{\n\"admin_menu_id\": 240,\n\"menu_pid\": 245,\n\"menu_name\": \"组织列表查询\",\n\"menu_url\": \"/admin/Group/list\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-08 11:46:11\",\n\"update_time\": \"2021-07-09 11:52:16\",\n\"is_menu\": 0,\n\"icon\": \"\",\n\"code\": \"/organization-query\",\n\"children\": []\n}\n\n]\n}\n]\n}\n\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminMenu.php",
    "groupTitle": "AdminMenu",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminMenu/list"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/add",
    "title": "角色添加",
    "group": "AdminRole",
    "name": "admin/AdminRole/add",
    "description": "<p>角色添加</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_desc",
            "description": "<p>角色描述</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_ids",
            "description": "<p>角色包含的权限id(逗号隔开)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"role_name\": 3,\n\"role_desc\": '',\n\"role_sort\": 200,\n\"admin_role_id\": 200,\n\"admin_menu_ids\": [\n235,\n245,\n240,\n242,\n241,\n243,\n244\n],\n\"create_time\": null,\n\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/dele",
    "title": "角色删除",
    "group": "AdminRole",
    "name": "admin/AdminRole/dele",
    "description": "<p>角色删除</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_id",
            "description": "<p>角色id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_role_id\": 200,\n\"is_delete\": 1,\n\"delete_time\": '',\n\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/dele"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/disable",
    "title": "角色是否禁用",
    "group": "AdminRole",
    "name": "admin/AdminRole/disable",
    "description": "<p>角色是否禁用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_id",
            "description": "<p>角色id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>1禁用 0否</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_role_id\": 200,\n\"is_disable\": 1,\n\"update_time\": '',\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/disable"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/edit",
    "title": "角色编辑",
    "group": "AdminRole",
    "name": "admin/AdminRole/edit",
    "description": "<p>角色编辑</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_id",
            "description": "<p>角色id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_desc",
            "description": "<p>角色描述</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "role_sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_ids",
            "description": "<p>角色包含的权限id(逗号隔开)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"role_name\": 3,\n\"role_desc\": '',\n\"role_sort\": 200,\n\"admin_role_id\": 200,\n\"admin_menu_ids\": [\n235,\n245,\n240,\n242,\n241,\n243,\n244\n],\n\"update_time\": null,\n\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/info",
    "title": "角色信息",
    "group": "AdminRole",
    "name": "admin/AdminRole/info",
    "description": "<p>角色信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_id",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_role_id\": 3,\n\"admin_menu_ids\": [\n235,\n245,\n240,\n242,\n241,\n243,\n244\n],\n\"role_name\": \"前端\",\n\"role_desc\": \"\",\n\"role_sort\": 200,\n\"is_disable\": 0,\n\"is_delete\": 0,\n\"create_time\": null,\n\"update_time\": \"2021-07-19 10:31:49\",\n\"delete_time\": null\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/info"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminRole/list",
    "title": "角色列表",
    "group": "AdminRole",
    "name": "admin/AdminRole/list",
    "description": "<p>角色列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "page",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "limit",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"count\": 3,\n\"pages\": 1,\n\"page\": 1,\n\"limit\": 10,\n\"list\": [\n{\n\"admin_role_id\": 3,\n\"role_name\": \"前端\",\n\"role_desc\": \"\",\n\"role_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": null,\n\"update_time\": \"2021-07-19 10:31:49\"\n},\n{\n\"admin_role_id\": 2,\n\"role_name\": \"演示\",\n\"role_desc\": \"\",\n\"role_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": null,\n\"update_time\": \"2021-07-16 14:13:59\"\n},\n{\n\"admin_role_id\": 1,\n\"role_name\": \"超管\",\n\"role_desc\": \"\",\n\"role_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": null,\n\"update_time\": \"2021-07-19 11:02:04\"\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminRole.php",
    "groupTitle": "AdminRole",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminRole/list"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUserCenter/avatar",
    "title": "用户修改头像",
    "group": "AdminUserCenter",
    "name": "admin/AdminUserCenter/avatar",
    "description": "<p>用户修改头像</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "avatar",
            "description": "<p>头像url</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"update_time\": \"\",\n\"avatar\": \"\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUserCenter.php",
    "groupTitle": "AdminUserCenter",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUserCenter/avatar"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUserCenter/edit",
    "title": "用户个人修改信息",
    "group": "AdminUserCenter",
    "name": "admin/AdminUserCenter/edit",
    "description": "<p>用户个人修改信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>账号id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": "<p>账号</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nickname",
            "description": "<p>昵称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>手机</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"username\": \"\",\n\"nickname\": \"\",\n\"email\": 200,\n\"phone\": 1,\n\"update_time\": \"2021-07-22 15:25:33\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUserCenter.php",
    "groupTitle": "AdminUserCenter",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUserCenter/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUserCenter/info",
    "title": "用户个人信息",
    "group": "AdminUserCenter",
    "name": "admin/AdminUserCenter/info",
    "description": "<p>用户个人信息</p>",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_user_id\": 1,\n\"avatar\": \"static/img/favicon.ico\",\n\"username\": \"skyselang\",\n\"nickname\": \"skyselang\",\n\"email\": \"\",\n\"phone\": \"\",\n\"create_time\": null,\n\"update_time\": \"2021-05-29 17:57:48\",\n\"login_time\": \"2021-06-11 15:03:31\",\n\"logout_time\": \"2021-06-08 15:46:10\",\n\"is_delete\": 0,\n\"group_name\": \"市场部\",\n\"roles\": [\n\"/admin/AdminMenu/add\",\n\"/admin/AdminMenu/edit\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUserCenter.php",
    "groupTitle": "AdminUserCenter",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUserCenter/info"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUserCenter/pwd",
    "title": "修改密码",
    "group": "AdminUserCenter",
    "name": "admin/AdminUserCenter/pwd",
    "description": "<p>修改密码</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password_old",
            "description": "<p>旧密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password_new",
            "description": "<p>新密码</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"update_time\": \"2021-07-23 10:27:16\",\n\"admin_user_id\": 2\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUserCenter.php",
    "groupTitle": "AdminUserCenter",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUserCenter/pwd"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/add",
    "title": "用户添加",
    "group": "AdminUser",
    "name": "admin/AdminUser/add",
    "description": "<p>用户添加</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": "<p>账号</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nickname",
            "description": "<p>昵称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>手机</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": "<p>组id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_ids",
            "description": "<p>用户具备的角色id(逗号隔开)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"username\": \"\",\n\"nickname\": \"\",\n\"email\": 200,\n\"phone\": 1,\n\"remark\": '',\n\"sort\": 2000,\n\"group_id\": 2,\n\"create_time\": \"2021-07-22 15:25:33\",\n\"admin_role_ids\": ''\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/avatar",
    "title": "重置头像",
    "group": "AdminUser",
    "name": "admin/AdminUser/avatar",
    "description": "<p>重置头像</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "avatar",
            "description": "<p>url</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"update_time\": \"\",\n\"avatar\": \"\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/avatar"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/dele",
    "title": "用户删除",
    "group": "AdminUser",
    "name": "admin/AdminUser/dele",
    "description": "<p>用户删除</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"delete_time\": \"\",\n\"is_delete\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/dele"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/disable",
    "title": "用户是否禁用",
    "group": "AdminUser",
    "name": "admin/AdminUser/disable",
    "description": "<p>用户是否禁用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>当前用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>1是 0否</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_menu_id\": \"1\",\n\"update_time\": \"\",\n\"is_disable\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/disable"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/edit",
    "title": "用户修改",
    "group": "AdminUser",
    "name": "admin/AdminUser/edit",
    "description": "<p>用户修改</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>账号id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": "<p>账号</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nickname",
            "description": "<p>昵称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>手机</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "remark",
            "description": "<p>备注</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sort",
            "description": "<p>排序</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": "<p>组id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_role_ids",
            "description": "<p>用户具备的角色id(逗号隔开)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"admin_user_id\": \"1\",\n\"username\": \"\",\n\"nickname\": \"\",\n\"email\": 200,\n\"phone\": 1,\n\"remark\": '',\n\"sort\": 2000,\n\"group_id\": 2,\n\"update_time\": \"2021-07-22 15:25:33\",\n\"admin_role_ids\": ''\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/getUserMenu",
    "title": "用户所具备的导航菜单",
    "group": "AdminUser",
    "name": "admin/AdminUser/getUserMenu",
    "description": "<p>用户所具备的导航菜单</p>",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_user_id\": 5,\n\"admin_role_ids\": \"1,2,3\",\n\"admin_menu_ids\": \"253,257\",\n\"username\": \"test\",\n\"nickname\": \"test\",\n\"phone\": \"\",\n\"email\": \"\",\n\"is_super\": 0,\n\"avatar\": \"static/img/favicon.ico\",\n\"is_delete\": 0,\n\"group_name\": \"流程与IT\",\n\"list\": [\n{\n\"admin_menu_id\": 235,\n\"menu_pid\": 0,\n\"menu_name\": \"组织管理\",\n\"menu_url\": \"\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-06 16:00:26\",\n\"update_time\": \"2021-07-13 09:14:19\",\n\"is_menu\": 1,\n\"icon\": \"el-icon-office-building\",\n\"code\": \"/organization\",\n\"children\": [\n{\n\"admin_menu_id\": 245,\n\"menu_pid\": 235,\n\"menu_name\": \"组织列表\",\n\"menu_url\": \"\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-08 14:25:08\",\n\"update_time\": \"2021-07-13 09:02:15\",\n\"is_menu\": 1,\n\"icon\": \"el-icon-s-fold\",\n\"code\": \"/list\",\n\"children\": [\n{\n\"admin_menu_id\": 240,\n\"menu_pid\": 245,\n\"menu_name\": \"组织列表查询\",\n\"menu_url\": \"/admin/Group/list\",\n\"menu_sort\": 100,\n\"is_disable\": 0,\n\"is_unauth\": 0,\n\"is_unlogin\": 0,\n\"create_time\": \"2021-07-08 11:46:11\",\n\"update_time\": \"2021-07-09 11:52:16\",\n\"is_menu\": 0,\n\"icon\": \"\",\n\"code\": \"/organization-query\",\n\"children\": []\n}\n]\n}\n]\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/getUserMenu"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/info",
    "title": "用户信息",
    "group": "AdminUser",
    "name": "admin/AdminUser/info",
    "description": "<p>用户信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_user_id\": 2,\n\"admin_role_ids\": [\n2\n],\n\"admin_menu_ids\": [],\n\"username\": \"admin\",\n\"nickname\": \"admin\",\n\"password\": \"e10adc3949ba59abbe56e057f20f883e\",\n\"phone\": \"\",\n\"email\": \"\",\n\"avatar\": \"static/img/favicon.ico\",\n\"remark\": \"\",\n\"sort\": 200,\n\"is_disable\": 0,\n\"is_super\": 0,\n\"is_delete\": 0,\n\"login_num\": 1,\n\"login_ip\": \"192.168.177.171\",\n\"login_region\": \"XXXX内网IP\",\n\"login_time\": \"2021-06-04 11:09:20\",\n\"logout_time\": \"2021-06-04 11:09:57\",\n\"create_time\": null,\n\"update_time\": null,\n\"delete_time\": null,\n\"group_id\": 2,\n\"is_open_switch\": 0,\n\"group_name\": \"SEM\",\n\"admin_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjY5NDkyNDYsIm5iZiI6MTYyNjk0OTI0NiwiZXhwIjoxNjI2OTkyNDQ2LCJkYXRhIjp7ImFkbWluX3VzZXJfaWQiOjIsImxvZ2luX3RpbWUiOiIyMDIxLTA2LTA0IDExOjA5OjIwIiwibG9naW5faXAiOiIxOTIuMTY4LjE3Ny4xNzEifX0.mqCS9eWc5hmQPFZrdkbQOyR--ib6OIiOalwR_8jRQrQ\",\n\"admin_role\": [\n{\n\"admin_role_id\": 3,\n\"role_name\": \"前端\",\n\"role_desc\": \"\",\n\"role_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": null,\n\"update_time\": \"2021-07-19 10:31:49\"\n}\n],\n\"menu_ids\": {\n\"1\": 235,\n\"2\": 245,\n\"27\": 252\n},\n\"admin_role_menu\": {\n\"1\": 235,\n\"2\": 245\n},\n\"roles\": [\n\"/admin/AdminMenu/add\",\n\"/admin/AdminMenu/edit\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/info"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/list",
    "title": "用户列表",
    "group": "AdminUser",
    "name": "admin/AdminUser/list",
    "description": "<p>用户列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "page",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "limit",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nickname",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"count\": 7,\n\"pages\": 1,\n\"page\": 1,\n\"limit\": 10,\n\"list\": [\n{\n\"admin_user_id\": 14,\n\"username\": \"testy\",\n\"nickname\": \"\",\n\"phone\": \"\",\n\"email\": \"\",\n\"sort\": 200,\n\"is_disable\": 0,\n\"is_super\": 0,\n\"login_num\": 16,\n\"create_time\": \"2021-07-20 09:30:07\",\n\"admin_role_ids\": \"10,3\",\n\"login_time\": \"2021-07-22 16:55:22\",\n\"group_id\": 17,\n\"group_name\": \"广州杰尔古格\"\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/list"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/pwd",
    "title": "重置密码",
    "group": "AdminUser",
    "name": "admin/AdminUser/pwd",
    "description": "<p>重置密码</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"update_time\": \"2021-07-23 10:27:16\",\n\"admin_user_id\": 2\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/pwd"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/AdminUser/rule",
    "title": "用户分配权限",
    "group": "AdminUser",
    "name": "admin/AdminUser/rule",
    "description": "<p>用户分配权限</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "admin_menu_ids",
            "description": "<p>权限id（逗号隔开）</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_open_switch",
            "description": "<p>开关 （1打开 0关闭）</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"admin_menu_ids\": \"\",\n\"is_open_switch\": 1,\n\"update_time\": \"2021-07-23 10:27:16\",\n\"admin_user_id\": 2\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/AdminUser.php",
    "groupTitle": "AdminUser",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/AdminUser/rule"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/Group/add",
    "title": "组织添加",
    "group": "Group",
    "name": "admin/Group/add",
    "description": "<p>组织添加</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_pid",
            "description": "<p>父级id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_sort",
            "description": "<p>排序</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"group_pid\": \"1\",\n\"group_name\": \"\",\n\"group_sort\": \"200\",\n\"group_id\": 2,\n\"create_time\": \"2021-07-22 15:25:33\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/Group/dele",
    "title": "组织删除",
    "group": "Group",
    "name": "admin/Group/dele",
    "description": "<p>组织删除</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": "<p>id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"group_id\": \"1\",\n\"delete_time\": \"\",\n\"is_delete\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/dele"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/Group/disable",
    "title": "组织是否禁用",
    "group": "Group",
    "name": "admin/Group/disable",
    "description": "<p>组织是否禁用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": "<p>id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "is_disable",
            "description": "<p>1是 0否</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"group_id\": \"1\",\n\"update_time\": \"\",\n\"is_disable\": \"1\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/disable"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/Group/edit",
    "title": "组织修改",
    "group": "Group",
    "name": "admin/Group/edit",
    "description": "<p>组织修改</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": "<p>id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_pid",
            "description": "<p>父级id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_name",
            "description": "<p>名称</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_sort",
            "description": "<p>排序</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"成功\",\n\"data\": {\n\"group_pid\": \"1\",\n\"group_name\": \"\",\n\"group_sort\": \"200\",\n\"group_id\": 2,\n\"update_time\": \"2021-07-22 15:25:33\",\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "admin/Group/info",
    "title": "组织信息",
    "group": "Group",
    "name": "admin/Group/info",
    "description": "<p>组织信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "group_id",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"group_id\": 1,\n\"group_pid\": 0,\n\"group_name\": \"市场部\",\n\"group_sort\": 200,\n\"is_disable\": 0,\n\"is_delete\": 0,\n\"create_time\": \"2021-06-25 14:15:31\",\n\"update_time\": \"2021-07-19 10:58:19\",\n\"delete_time\": null,\n\"group_no\": \"\",\n\"parent_group_name\": null\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/info"
      }
    ]
  },
  {
    "type": "get",
    "url": "admin/Group/list",
    "title": "组织列表",
    "group": "Group",
    "name": "admin/Group/list",
    "description": "<p>组织列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "page",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "limit",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "username",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nickname",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "{\n\"code\": 200,\n\"msg\": \"操作成功\",\n\"data\": {\n\"list\": [\n{\n\"group_id\": 1,\n\"group_pid\": 0,\n\"group_name\": \"市场部\",\n\"group_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": \"2021-06-25 14:15:31\",\n\"update_time\": \"2021-07-19 10:58:19\",\n\"parent_group_name\": null,\n\"children\": [\n{\n\"group_id\": 9,\n\"group_pid\": 1,\n\"group_name\": \"市场部1\",\n\"group_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": \"2021-07-02 14:06:23\",\n\"update_time\": \"2021-07-19 11:01:29\",\n\"parent_group_name\": \"市场部\",\n\"children\": [\n{\n\"group_id\": 15,\n\"group_pid\": 9,\n\"group_name\": \"233\",\n\"group_sort\": 200,\n\"is_disable\": 0,\n\"create_time\": \"2021-07-08 14:18:46\",\n\"update_time\": null,\n\"parent_group_name\": \"市场部1\",\n\"children\": []\n}\n]\n}\n]\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/admin/controller/Group.php",
    "groupTitle": "Group",
    "sampleRequest": [
      {
        "url": "192.168.177.171:10034/admin/Group/list"
      }
    ]
  }
] });
