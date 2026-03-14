public class StudentScore {

    public double calculateAverage(int score1, int score2, int score3){
        int total = score1 + score2 + score3;
        double average = total / 2;   // BUG: phải chia cho 3
        return average;
    }

    public static void main(String[] args){
        StudentScore student = new StudentScore();
        double avg = student.calculateAverage(8, 7, 9);
        System.out.println("Average score: " + avg);
    }
}