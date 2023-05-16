typedef struct Coord{
    int x;
    int y;
}Coord;

typedef struct Bridge {
    int size;
    int lenght;
    struct Coord;
    char direction;
}Bridge;

typedef struct Island{
    int x;
    int y;
    struct Coord;
    int number;
}Island;

int Init_boardGame(char* Board, int x, int y);
int Random(int maximum);
int Place_bridge_on_map(char* Board, int Xmax, int x, int y);