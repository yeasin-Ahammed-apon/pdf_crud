# laravel 8
## implemented things given below
   - Blade templet
   - Schema
   - Mirgate
   - Controller
   - Storage
   - Validation
   - Session                  
_______________________________________________________________________

## About this project
- database name : table_pdf_crud
- table name : pdf
- tables schema are given just need to migrate
    - column
	- name
	- pdf_file_name

- mainly focused on pdf create ,edit,update,delete and download
- pdf maintain system
	- create or upload a new pdf file
	    - validation if the same name file exist or not
	    - validation is the file is pdf or not
	- edit and update  a pdf
	    - validate(same name exist and ignor this file name)
	    - validate is the file is pdf or not
	    - if new pdf given then delete the previous pdf file and update the name
    - delete a pdf
        - remove pdf from public directory and data base
- validate
    - required | unique:pdf,name,id,id_column	    
    - required | mmies: pdf	    
- validate error massage
    - send fail massage to blade with $error
- session massage
    - if submission success , send a massage through session
	
