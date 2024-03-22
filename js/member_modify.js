   function check_input()
   {
      if (!document.member_form.password.value)
      {
          alert("비밀번호를 입력하세요!");    
          document.member_form.password.focus();
          return;
      }
      if (!document.member_form.password_check.value)
      {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.password_check.focus();
          return;
      }
      if (!document.member_form.email.value)
      {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }
      if (!document.member_form.mobile_tel.value)
      {
          alert("휴대폰 번호를 입력하세요!");    
          document.member_form.mobile_tel.focus();
          return;
      }
      if (!document.member_form.address_.value)
      {
          alert("주소를 입력하세요!");    
          return;
      }
      if (!document.member_form.address_detail.value)
      {
          alert("상세주소를 입력하세요!");    
          return;
      }
      if (document.member_form.password.value != 
            document.member_form.password_check.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.password.focus();
          document.member_form.password.select();
          return;
      }

      document.member_form.submit();
   }