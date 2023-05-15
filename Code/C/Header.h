typedef struct Bridge {
    int size;
    int lenght;
    struct Coord;
    char direction;
}Bridge;

typedef struct Coord{
    int x;
    int y;
}Coord;

typedef struct Island{
    int x;
    int y;
    struct Coord;
    int number;
}Island;

int Init_boardGame(char* Board);