typedef struct Coord{
    int x;
    int y;
}Coord;

typedef struct Bridge {
    int size;
    int lenght;
    Coord pos;
    int direction;
}Bridge;

typedef struct Island{
    Coord pos;
    int number;
}Island;

void Place_bridge_on_map(char* Board, int Ymax, Coord pos, int type_bridge);
int Space_next_bridge(char* Board, Coord pos, Coord posMax);
int Random(int maximum);
char* Init_boardGame(Coord pos);
Coord* Next_Coord(Coord* pos, int direction);
