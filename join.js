$(function(){
    var memberPw = $('.memberPw');
    var memberPw2 = $('.memberPw2');
    var memberPw2Comment = $('.memberPw2Comment');
    var pwCheck2 = $('.pwCheck2');
 
    //비밀번호 동일 한지 체크
    memberPw2.blur(function(){
       if(memberPw.val() == memberPw2.val()){
           memberPw2Comment.text('비밀번호가 일치합니다.');
           pwCheck2.val('1');
       }else{
           memberPw2Comment.text('비밀번호가 일치하지 않습니다.');
 
       }
    });
});
 
function checkSubmit(){
    var idCheck = $('.memberId');
    var pwCheck1 = $('.memberPw');
    var pwCheck2 = $('.memberPw2');
    var memberNickName = $('.memberNickName');
 
 
    if(idCheck.val() == ''){
        alert('아이디를 입력해주세요.');
        return false;
    }
    if(pwCheck1.val()==''){
        alert('비밀번호를 입력해주세요.');
        return false;
    }
    if(pwCheck2.val() != pwCheck1.val()){
        alert('비밀번호 확인을 다시 해주세요.');
        return false;
    }
    if(memberNickName.val() == ''){
        alert('닉네임을 입력해주세요.');
        return false;
    }
    return true;
}
