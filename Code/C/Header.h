typedef struct Bridge {
    int size;
    int x;
    int y; 
    char direction;
}Bridge;

typedef struct Island{
    int x;
    int y;
    int number;
}Island;

int Init_boardGame(char* Board, int x, int y);
int Random_number(int maximum);