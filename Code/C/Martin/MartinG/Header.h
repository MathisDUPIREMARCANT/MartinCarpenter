typedef struct Coord{
    int x;
    int y;
}Coord;

typedef struct Bridge {
    int size;
    int lenght;
    struct Coord;
    int direction;
}Bridge;

typedef struct Island{
    int x;
    int y;
    struct Coord;
    int number;
}Island;

int Init_boardGame(int x, int y);
int Random(int maximum);
int Place_bridge_on_map(char* Board, int Ymax, int x, int y, int type_bridge);
int Space_next_bridge(char* Board, int x, int y, int Xmax, int Ymax);