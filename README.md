<!-- TOC start (generated with https://github.com/derlin/bitdowntoc) -->

- [1. Public](#1-public)
   * [1.1. log in](#11-log-in)
   * [1.2. fetch posts](#12-fetch-posts)
   * [1.3. read post](#13-read-post)
   * [1.4. fetch tags](#14-fetch-tags)
   * [1.5. show tag](#15-show-tag)
   * [1.6. fetch categories](#16-fetch-categories)
   * [1.7. show category](#17-show-category)
- [2. Dashboard](#2-dashboard)
   * [2.1. User](#21-user)
      + [2.1.1. user](#211-user)
      + [2.1.2. change password](#212-change-password)
      + [2.1.3. change password again](#213-change-password-again)
      + [2.1.4. update profile](#214-update-profile)
      + [2.1.5. logout](#215-logout)
   * [2.2. media](#22-media)
      + [2.2.1. upload image](#221-upload-image)
      + [2.2.2. list images](#222-list-images)
      + [2.2.3. delete image](#223-delete-image)
      + [2.2.4. multiple upload](#224-multiple-upload)
      + [2.2.5. multiple delete](#225-multiple-delete)
   * [2.3. Posts](#23-posts)
      + [2.3.1. CRUD](#231-crud)
         - [2.3.1.1. create post](#2311-create-post)
         - [2.3.1.2. post index](#2312-post-index)
         - [2.3.1.3. update post](#2313-update-post)
         - [2.3.1.4. show post](#2314-show-post)
         - [2.3.1.5. delete post](#2315-delete-post)
         - [2.3.1.6. bulk delete](#2316-bulk-delete)
      + [2.3.2. query posts](#232-query-posts)
         - [2.3.2.1. search](#2321-search)
         - [2.3.2.2. filter by category](#2322-filter-by-category)
         - [2.3.2.3. sorting](#2323-sorting)
      + [2.3.3. Soft delete related](#233-soft-delete-related)
         - [2.3.3.1. show trash](#2331-show-trash)
         - [2.3.3.2. empty trash](#2332-empty-trash)
         - [2.3.3.3. recycle trash](#2333-recycle-trash)
         - [2.3.3.4. restore post](#2334-restore-post)
         - [2.3.3.5. force delete post](#2335-force-delete-post)
   * [2.4. Categories](#24-categories)
      + [2.4.1. list categories](#241-list-categories)
      + [2.4.2. create category](#242-create-category)
      + [2.4.3. update category](#243-update-category)
      + [2.4.4. show category](#244-show-category)
      + [2.4.5. delete category](#245-delete-category)
   * [2.5. Tags](#25-tags)
      + [2.5.1. create tag](#251-create-tag)
      + [2.5.2. update tag](#252-update-tag)
      + [2.5.3. show tag](#253-show-tag)
      + [2.5.4. list tags](#254-list-tags)
      + [2.5.5. delete tag](#255-delete-tag)

<!-- TOC end -->

<!-- API Documentation generated with https://github.com/linn221/generate-md-postman.json -->
<!-- TOC --><a name="1-public"></a>
# 1. Public
<!-- TOC --><a name="11-log-in"></a>
## 1.1. log in

*return personal access token for authentication (bearer token header)*

**POST**
```http
http://localhost:8000/api/login
```
[*formdata*]

Key      | Type | Value            
-------- | ---- | -----------------
email    | text | admin@example.com
password | text | helloworld       
password | text | password         


<!-- TOC --><a name="12-fetch-posts"></a>
## 1.2. fetch posts


**GET**
```http
http://localhost:8000/api/posts?cat_id=2&kw=lore&order=title
```

<!-- TOC --><a name="13-read-post"></a>
## 1.3. read post


**GET**
```http
http://localhost:8000/api/post/hello-world
```

<!-- TOC --><a name="14-fetch-tags"></a>
## 1.4. fetch tags


**GET**
```http
http://localhost:8000/api/tags
```

<!-- TOC --><a name="15-show-tag"></a>
## 1.5. show tag


**GET**
```http
http://localhost:8000/api/tag/flutter
```

<!-- TOC --><a name="16-fetch-categories"></a>
## 1.6. fetch categories


**GET**
```http
http://localhost:8000/api/categories
```

<!-- TOC --><a name="17-show-category"></a>
## 1.7. show category


**GET**
```http
http://localhost:8000/api/category/backend
```

----------------------------
<!-- TOC --><a name="2-dashboard"></a>
# 2. Dashboard
<!-- TOC --><a name="21-user"></a>

## Authentication

**Endpoints require authentication using a bearer token. The token must be included in the request headers with the key Authorization.**

```http
Authorization: Bearer 1|uxWwSBeQqRFCNY9GKHOGfaYHpV8EiGOPWJVm8YCm
```
<br>

## 2.1. User
<!-- TOC --><a name="211-user"></a>
### 2.1.1. user


**GET**
```http
http://localhost:8000/api/dashboard/user
```

<!-- TOC --><a name="212-change-password"></a>
### 2.1.2. change password


**POST**
```http
http://localhost:8000/api/dashboard/change-password
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
http://localhost:8000/api/dashboard/change-password
```
[*formdata*]

Key          | Type | Value     
------------ | ---- | ----------
new_password | text | password  
old_password | text | helloworld


<!-- TOC --><a name="214-update-profile"></a>
### 2.1.4. update profile


**PATCH**
```http
http://localhost:8000/api/dashboard/user
```
[*urlencoded*]

Key         | Type | Value                
----------- | ---- | ---------------------
name        | text | Linn                 
email       | text | linncoffeee@gmail.com
information | text | i love coffee        


<!-- TOC --><a name="215-logout"></a>
### 2.1.5. logout


**POST**
```http
http://localhost:8000/api/dashboard/logout
```

----------------------------
<!-- TOC --><a name="22-media"></a>
## 2.2. media
<!-- TOC --><a name="221-upload-image"></a>
### 2.2.1. upload image


**POST**
```http
http://localhost:8000/api/dashboard/image
```
[*formdata*]

Key     | Type | Value     
------- | ---- | ----------
image   | file |           
caption | text | i am a boy


<!-- TOC --><a name="222-list-images"></a>
### 2.2.2. list images


**GET**
```http
http://localhost:8000/api/dashboard/image
```

<!-- TOC --><a name="223-delete-image"></a>
### 2.2.3. delete image


**DELETE**
```http
http://localhost:8000/api/dashboard/image/4
```

<!-- TOC --><a name="224-multiple-upload"></a>
### 2.2.4. multiple upload

Note:
upload mutliple images, no caption support\
\
**POST**
```http
http://localhost:8000/api/dashboard/image/bulk-upload
```
[*formdata*]

Key     | Type | Value
------- | ---- | -----
image[] | file |      


<!-- TOC --><a name="225-multiple-delete"></a>
### 2.2.5. multiple delete


**POST**
```http
http://localhost:8000/api/dashboard/image/bulk-delete
```
[*formdata*]

Key   | Type | Value
----- | ---- | -----
ids[] | text | 7    
ids[] | text | 8    


----------------------------
<!-- TOC --><a name="23-posts"></a>
## 2.3. Posts
<!-- TOC --><a name="231-crud"></a>
### 2.3.1. CRUD
<!-- TOC --><a name="2311-create-post"></a>
#### 2.3.1.1. create post


**POST**
```http
http://localhost:8000/api/dashboard/post
```
[*formdata*]

Key         | Type | Value                                     
----------- | ---- | ------------------------------------------
title       | text | how to save a life                        
content     | text | to be or not to be                        
slug        | text | hello world                               
category_id | text | 2                                         
tags[]      | text | 2                                         
tags[]      | text | 3                                         
tags[]      | text | 4                                         
cover_img   | text | im the url string of the actual image file


<!-- TOC --><a name="2312-post-index"></a>
#### 2.3.1.2. post index


**GET**
```http
http://localhost:8000/api/dashboard/post?kw=save a life
```

<!-- TOC --><a name="2313-update-post"></a>
#### 2.3.1.3. update post


**PUT**
```http
http://localhost:8000/api/dashboard/post/277
```
[*urlencoded*]

Key         | Type | Value                                                                                                                                                                            
----------- | ---- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
title       | text | hello world                                                                                                                                                                      
content     | text | to be or not to belkdsddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
slug        | text | dddfdsxs                                                                                                                                                                         
category_id | text | 1                                                                                                                                                                                
tags[]      | text | 2                                                                                                                                                                                
tags[]      | text | 3                                                                                                                                                                                
cover_img   | text | im the updated one, NOT optional                                                                                                                                                 


<!-- TOC --><a name="2314-show-post"></a>
#### 2.3.1.4. show post


**GET**
```http
http://localhost:8000/api/dashboard/post/279
```

<!-- TOC --><a name="2315-delete-post"></a>
#### 2.3.1.5. delete post


**DELETE**
```http
http://localhost:8000/api/dashboard/post/302
```

<!-- TOC --><a name="2316-bulk-delete"></a>
#### 2.3.1.6. bulk delete


**POST**
```http
http://localhost:8000/api/dashboard/post/bulk-delete
```
[*formdata*]

Key   | Type | Value
----- | ---- | -----
ids[] | text | 1    
ids[] | text | 4    


----------------------------
<!-- TOC --><a name="232-query-posts"></a>
### 2.3.2. query posts
<!-- TOC --><a name="2321-search"></a>
#### 2.3.2.1. search


**GET**
```http
http://localhost:8000/api/dashboard/post?kw=lore
```

<!-- TOC --><a name="2322-filter-by-category"></a>
#### 2.3.2.2. filter by category


**GET**
```http
http://localhost:8000/api/dashboard/post?cat_id=1
```

<!-- TOC --><a name="2323-sorting"></a>
#### 2.3.2.3. sorting


**GET**
```http
http://localhost:8000/api/dashboard/post?order=updated_at
```

----------------------------
<!-- TOC --><a name="233-soft-delete-related"></a>
### 2.3.3. Soft delete related
<!-- TOC --><a name="2331-show-trash"></a>
#### 2.3.3.1. show trash


**GET**
```http
http://localhost:8000/api/dashboard/trash
```

<!-- TOC --><a name="2332-empty-trash"></a>
#### 2.3.3.2. empty trash


**POST**
```http
http://localhost:8000/api/dashboard/trash/empty-all
```

<!-- TOC --><a name="2333-recycle-trash"></a>
#### 2.3.3.3. recycle trash


**POST**
```http
http://localhost:8000/api/dashboard/trash/recycle-all
```

<!-- TOC --><a name="2334-restore-post"></a>
#### 2.3.3.4. restore post


**POST**
```http
http://localhost:8000/api/dashboard/trash/recycle/14
```

<!-- TOC --><a name="2335-force-delete-post"></a>
#### 2.3.3.5. force delete post


**POST**
```http
http://localhost:8000/api/dashboard/trash/empty/303
```

----------------------------
<!-- TOC --><a name="24-categories"></a>
## 2.4. Categories
<!-- TOC --><a name="241-list-categories"></a>
### 2.4.1. list categories


**GET**
```http
http://localhost:8000/api/dashboard/category
```

<!-- TOC --><a name="242-create-category"></a>
### 2.4.2. create category


**POST**
```http
http://localhost:8000/api/dashboard/category
```
[*formdata*]

Key  | Type | Value  
---- | ---- | -------
name | text | laravel


<!-- TOC --><a name="243-update-category"></a>
### 2.4.3. update category


**PUT**
```http
http://localhost:8000/api/dashboard/category/3
```
[*urlencoded*]

Key  | Type | Value        
---- | ---- | -------------
name | text | ruby on rails


<!-- TOC --><a name="244-show-category"></a>
### 2.4.4. show category


**GET**
```http
http://localhost:8000/api/dashboard/category/3
```

<!-- TOC --><a name="245-delete-category"></a>
### 2.4.5. delete category


**DELETE**
```http
http://localhost:8000/api/dashboard/category/1
```

----------------------------
<!-- TOC --><a name="25-tags"></a>
## 2.5. Tags
<!-- TOC --><a name="251-create-tag"></a>
### 2.5.1. create tag


**POST**
```http
http://localhost:8000/api/dashboard/tag
```
[*formdata*]

Key  | Type | Value    
---- | ---- | ---------
name | text | eloquentt


<!-- TOC --><a name="252-update-tag"></a>
### 2.5.2. update tag


**PUT**
```http
http://localhost:8000/api/dashboard/tag/2
```
[*urlencoded*]

Key  | Type | Value     
---- | ---- | ----------
name | text | collection


<!-- TOC --><a name="253-show-tag"></a>
### 2.5.3. show tag


**GET**
```http
http://localhost:8000/api/dashboard/tag/3
```

<!-- TOC --><a name="254-list-tags"></a>
### 2.5.4. list tags


**GET**
```http
http://localhost:8000/api/dashboard/tag
```

<!-- TOC --><a name="255-delete-tag"></a>
### 2.5.5. delete tag


**DELETE**
```http
http://localhost:8000/api/dashboard/tag/1
```

----------------------------
