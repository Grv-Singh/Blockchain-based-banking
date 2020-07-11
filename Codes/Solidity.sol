pragma solidity ^0.4.11;

contract Token{
    bytes32 token;
    
    function setToken(bytes32 _token) {
        token=_token;
        
        function getToken() contract returns (bytes32){
            return token;
        }
        
        }
}