## Authentication

**All endpoints require authentication using a bearer token. The token must be included in the request headers with the key Authorization.**

```http
Authorization: Bearer 2|uxWwSBeQqRFCNY9GKHOGfaYHpV8EiGOPWJVm8YCm
```
<br>
<br>
<!-- TOC start (generated with https://github.com/derlin/bitdowntoc) -->

- [1. Public](#1-public)
   * [1.1. fetch posts](#11-fetch-posts)
   * [1.2. read post](#12-read-post)
   * [1.3. fetch tags](#13-fetch-tags)
   * [1.4. show tag](#14-show-tag)
   * [1.5. fetch categories](#15-fetch-categories)
   * [1.6. show category](#16-show-category)
- [2. Dashboard](#2-dashboard)
   * [2.1. User](#21-user)
      + [2.1.1. logout](#211-logout)
      + [2.1.2. change password](#212-change-password)
      + [2.1.3. change password again](#213-change-password-again)
      + [2.1.4. user](#214-user)
      + [2.1.5. update profile](#215-update-profile)
   * [2.2. Categories](#22-categories)
      + [2.2.1. list categories](#221-list-categories)
      + [2.2.2. create category](#222-create-category)
      + [2.2.3. update category](#223-update-category)
      + [2.2.4. show category](#224-show-category)
      + [2.2.5. delete category](#225-delete-category)
   * [2.3. Tags](#23-tags)
      + [2.3.1. create tag](#231-create-tag)
      + [2.3.2. update tag](#232-update-tag)
      + [2.3.3. get tag](#233-get-tag)
      + [2.3.4. list tags](#234-list-tags)
      + [2.3.5. delete tag](#235-delete-tag)
   * [2.4. Posts](#24-posts)
      + [2.4.1. Soft delete related](#241-soft-delete-related)
         - [2.4.1.1. show trash](#2411-show-trash)
         - [2.4.1.2. empty trash](#2412-empty-trash)
         - [2.4.1.3. recycle trash](#2413-recycle-trash)
         - [2.4.1.4. restore post](#2414-restore-post)
         - [2.4.1.5. force delete post](#2415-force-delete-post)
      + [2.4.2. create post](#242-create-post)
      + [2.4.3. update posts](#243-update-posts)
      + [2.4.4. get post](#244-get-post)
      + [2.4.5. list posts](#245-list-posts)
      + [2.4.6. delete post](#246-delete-post)
      + [2.4.7. bulk delete](#247-bulk-delete)
   * [2.5. media](#25-media)
      + [2.5.1. upload image](#251-upload-image)
      + [2.5.2. index image](#252-index-image)
      + [2.5.3. delete image](#253-delete-image)
      + [2.5.4. multiple upload](#254-multiple-upload)
      + [2.5.5. multiple delete](#255-multiple-delete)
- [3. log in](#3-log-in)

<!-- TOC end -->

<!-- API Documentation generated with https://github.com/linn221/generate-md-postman.json -->
<!-- TOC --><a name="1-public"></a>
# 1. Public
<!-- TOC --><a name="11-fetch-posts"></a>
## 1.1. fetch posts


**GET**
```http
{{public}}/posts?cat_id=1&order=updated_at&kw=lore
```

<!-- TOC --><a name="12-read-post"></a>
## 1.2. read post


**GET**
```http
{{public}}/post/hello-world
```

<!-- TOC --><a name="13-fetch-tags"></a>
## 1.3. fetch tags


**GET**
```http
{{public}}/tags
```

<!-- TOC --><a name="14-show-tag"></a>
## 1.4. show tag


**GET**
```http
{{public}}/tag/flutter
```

<!-- TOC --><a name="15-fetch-categories"></a>
## 1.5. fetch categories


**GET**
```http
{{public}}/categories
```

<!-- TOC --><a name="16-show-category"></a>
## 1.6. show category


**GET**
```http
{{public}}/category/frontend
```

----------------------------
<!-- TOC --><a name="2-dashboard"></a>
# 2. Dashboard
<!-- TOC --><a name="21-user"></a>
## 2.1. User
<!-- TOC --><a name="211-logout"></a>
### 2.1.1. logout


**POST**
```http
{{url}}/logout
```

<!-- TOC --><a name="212-change-password"></a>
### 2.1.2. change password


**POST**
```http
{{url}}/change-password
```
[*formdata*]

Key          | Type | Value     
------------ | ---- | ----------
old_password | text | password  
new_password | text | helloworld


<!-- TOC --><a name="213-change-password-again"></a>
### 2.1.3. change password again


**POST**
```http
{{url}}/change-password
```
[*formdata*]

Key          | Type | Value     
------------ | ---- | ----------
new_password | text | password  
old_password | text | helloworld


<!-- TOC --><a name="214-user"></a>
### 2.1.4. user


**GET**
```http
{{url}}/user
```

<!-- TOC --><a name="215-update-profile"></a>
### 2.1.5. update profile


**PATCH**
```http
{{url}}/user
```
[*urlencoded*]

Key         | Type | Value                
----------- | ---- | ---------------------
name        | text | Linn                 
email       | text | linncoffeee@gmail.com
information | text | i love coffee        


----------------------------
<!-- TOC --><a name="22-categories"></a>
## 2.2. Categories
<!-- TOC --><a name="221-list-categories"></a>
### 2.2.1. list categories


**GET**
```http
{{url}}/category
```

<!-- TOC --><a name="222-create-category"></a>
### 2.2.2. create category


**POST**
```http
{{url}}/category
```
[*formdata*]

Key  | Type | Value  
---- | ---- | -------
name | text | laravel


<!-- TOC --><a name="223-update-category"></a>
### 2.2.3. update category


**PUT**
```http
{{url}}/category/3
```
[*urlencoded*]

Key  | Type | Value        
---- | ---- | -------------
name | text | ruby on rails


<!-- TOC --><a name="224-show-category"></a>
### 2.2.4. show category


**GET**
```http
{{url}}/category/3
```

<!-- TOC --><a name="225-delete-category"></a>
### 2.2.5. delete category


**DELETE**
```http
{{url}}/category/1
```

----------------------------
<!-- TOC --><a name="23-tags"></a>
## 2.3. Tags
<!-- TOC --><a name="231-create-tag"></a>
### 2.3.1. create tag


**POST**
```http
{{url}}/tag
```
[*formdata*]

Key  | Type | Value    
---- | ---- | ---------
name | text | eloquentt


<!-- TOC --><a name="232-update-tag"></a>
### 2.3.2. update tag


**PUT**
```http
{{url}}/tag/3
```
[*urlencoded*]

Key  | Type | Value     
---- | ---- | ----------
name | text | collection


<!-- TOC --><a name="233-get-tag"></a>
### 2.3.3. get tag


**GET**
```http
{{url}}/tag/1
```

<!-- TOC --><a name="234-list-tags"></a>
### 2.3.4. list tags


**GET**
```http
{{url}}/tag
```

<!-- TOC --><a name="235-delete-tag"></a>
### 2.3.5. delete tag


**DELETE**
```http
{{url}}/tag/1
```

----------------------------
<!-- TOC --><a name="24-posts"></a>
## 2.4. Posts
<!-- TOC --><a name="241-soft-delete-related"></a>
### 2.4.1. Soft delete related
<!-- TOC --><a name="2411-show-trash"></a>
#### 2.4.1.1. show trash


**GET**
```http
{{url}}/trash
```

<!-- TOC --><a name="2412-empty-trash"></a>
#### 2.4.1.2. empty trash


**POST**
```http
{{url}}/trash/empty-all
```

<!-- TOC --><a name="2413-recycle-trash"></a>
#### 2.4.1.3. recycle trash


**POST**
```http
{{url}}/trash/recycle-all
```

<!-- TOC --><a name="2414-restore-post"></a>
#### 2.4.1.4. restore post


**POST**
```http
{{url}}/trash/recycle/14
```

<!-- TOC --><a name="2415-force-delete-post"></a>
#### 2.4.1.5. force delete post


**POST**
```http
{{url}}/trash/post/empty/14
```

----------------------------
<!-- TOC --><a name="242-create-post"></a>
### 2.4.2. create post


**POST**
```http
{{url}}/post
```
[*formdata*]

Key         | Type | Value                                     
----------- | ---- | ------------------------------------------
title       | text | how to save a life                        
content     | text | to be or not to be                        
slug        | text | hello world                               
category_id | text | 3                                         
tags[]      | text | 2                                         
tags[]      | text | 3                                         
cover_img   | text | im the url string of the actual image file


<!-- TOC --><a name="243-update-posts"></a>
### 2.4.3. update posts


**PUT**
```http
{{url}}/post/1
```
[*urlencoded*]

Key         | Type | Value                                                                                                                                                                            
----------- | ---- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
title       | text | hello world                                                                                                                                                                      
content     | text | to be or not to belkdsddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
slug        | text | hello world                                                                                                                                                                      
category_id | text | 2                                                                                                                                                                                
tags[]      | text | 2                                                                                                                                                                                
tags[]      | text | 3                                                                                                                                                                                
cover_img   | text | im the updated one, NOT optional                                                                                                                                                 


<!-- TOC --><a name="244-get-post"></a>
### 2.4.4. get post


**GET**
```http
{{url}}/post/10
```

<!-- TOC --><a name="245-list-posts"></a>
### 2.4.5. list posts


**GET**
```http
{{url}}/post?kw=lore
```

<!-- TOC --><a name="246-delete-post"></a>
### 2.4.6. delete post


**DELETE**
```http
{{url}}/post/14
```

<!-- TOC --><a name="247-bulk-delete"></a>
### 2.4.7. bulk delete


**POST**
```http
{{url}}/post/bulk-delete
```
[*formdata*]

Key   | Type | Value
----- | ---- | -----
ids[] | text | 1    
ids[] | text | 4    


----------------------------
<!-- TOC --><a name="25-media"></a>
## 2.5. media
<!-- TOC --><a name="251-upload-image"></a>
### 2.5.1. upload image


**POST**
```http
{{url}}/image
```
[*formdata*]

Key     | Type | Value     
------- | ---- | ----------
image   | file |           
caption | text | i am a boy


<!-- TOC --><a name="252-index-image"></a>
### 2.5.2. index image


**GET**
```http
{{url}}/image
```

<!-- TOC --><a name="253-delete-image"></a>
### 2.5.3. delete image


**DELETE**
```http
{{url}}/image/4
```

<!-- TOC --><a name="254-multiple-upload"></a>
### 2.5.4. multiple upload

Note:
upload mutliple images, no caption support\
\
**POST**
```http
{{url}}/image/bulk-upload
```
[*formdata*]

Key     | Type | Value
------- | ---- | -----
image[] | file |      


<!-- TOC --><a name="255-multiple-delete"></a>
### 2.5.5. multiple delete


**POST**
```http
{{url}}/image/bulk-delete
```
[*formdata*]

Key   | Type | Value
----- | ---- | -----
ids[] | text | 7    
ids[] | text | 8    


----------------------------
<!-- TOC --><a name="3-log-in"></a>
# 3. log in


**POST**
```http
{{url}}/login
```
[*formdata*]

Key      | Type | Value            
-------- | ---- | -----------------
email    | text | admin@example.com
password | text | helloworld       
password | text | password         


----------------------------

