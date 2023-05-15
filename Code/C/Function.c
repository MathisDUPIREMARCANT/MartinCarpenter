int Init_boardGame(char* Board, int x, int y){
    for(int i = 0; i < (x*y); i++){
        *(Board + i) = "*";
    }
}