<?php

interface IPublishable {
    
    /* ADVERTS */
    function showAdverts();
    
    function addAdvert();
    
    function editAdvert($id);
    
    function deleteAdvert($id);
    
    function showProfile();
    
    function editProfile();
    
    function promoteAdvert();
    
    function getBalance();
    
    function increaseBalance();
    
    /* BLOG */
    function addComment($id);
    
    function editComment($id); 
}
